package Chess.Core;

import Chess.Core.Pieces.DummyPiece;
import org.junit.jupiter.api.Test;

import java.util.HashSet;

import static org.junit.jupiter.api.Assertions.*;

public class BoardTests
{
    @Test
    public void getPiece_canThrowFieldNotFound()
    {
        var board = new Board();
        assertThrows(Board.FieldNotFound.class, () -> board.getPiece(new Coords(0, 0)));
    }

    @Test
    public void canGetPiece() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var piece = new DummyPiece(Color.white);
        var field = new Field(new Coords(5, 5), piece);
        var fields = new HashSet<Field>();
        var board = new Board(fields);
        fields.add(field);
        assertEquals(piece, board.getPiece(new Coords(5, 5)));
    }

    @Test
    public void setPiece_canThrowFieldNotFound()
    {
        var board = new Board();
        assertThrows(Board.FieldNotFound.class, () -> board.setPiece(new Coords(0, 0), new DummyPiece(Color.white)));
    }

    @Test
    public void canSetPiece() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var field = new Field(new Coords(4, 4));
        var fields = new HashSet<Field>();
        var board = new Board(fields);
        fields.add(field);
        board.setPiece(new Coords(4,4), new DummyPiece(Color.white));
    }

    @Test
    public void removePiece_canThrowFieldNotFound()
    {
        var board = new Board();
        assertThrows(Board.FieldNotFound.class, () -> board.removePiece(new Coords(0, 0)));
    }

    @Test
    public void canRemovePiece() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var coords = new Coords(7,7);
        var piece = new DummyPiece(Color.white);
        var field = new Field(coords, piece);
        var fields = new HashSet<Field>();
        var board = new Board(fields);

        fields.add(field);
        board.removePiece(coords);

        assertThrows(Field.NoPieceAvailable.class, () -> board.getPiece(coords));
    }

    @Test
    public void canAddOverriddenPieceToTakenPieces() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var coords = new Coords(7,7);
        var piece = new DummyPiece(Color.white);
        var newPiece = new DummyPiece(Color.white);
        var field = new Field(coords, piece);
        var fields = new HashSet<Field>();
        var board = new Board(fields);

        fields.add(field);
        board.setPiece(coords, newPiece);

        assertTrue(board.getTakenPieces().contains(piece));
    }

    @Test
    public void canReturnFalseForPieceOnField()
    {
        var coords = new Coords(7,7);
        var field = new Field(coords);
        var fields = new HashSet<Field>();
        var board = new Board(fields);

        fields.add(field);

        assertFalse(board.pieceOnField(coords));
    }

    @Test
    public void canReturnTrueForPieceOnField()
    {
        var coords = new Coords(7,7);
        var field = new Field(coords, new DummyPiece(Color.white));
        var fields = new HashSet<Field>();
        var board = new Board(fields);

        fields.add(field);

        assertTrue(board.pieceOnField(coords));
    }
}