package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

public class KingTest
{
    Board board;
    Rook rook;
    King king;

    @BeforeEach
    void init()
    {
        board = new Board();
        rook = new Rook(Color.black, board);
        king = new King(Color.black, board);
    }

    @Test
    void canCastleShort() throws Field.NoPieceAvailable, Board.FieldNotFound, Piece.MoveNotPossible, LocateKing.KingNotFound
    {
        Coords coords = new Coords(5, 1);
        board.setPiece(new Coords(8, 1), rook);
        board.setPiece(coords, king);
        king.move(State.active, coords, new Coords(7, 1));
        assertEquals(king, board.getPiece(new Coords(7, 1)));
        assertEquals(rook, board.getPiece(new Coords(6, 1)));
    }

    @Test
    void canCastleLong() throws Field.NoPieceAvailable, Board.FieldNotFound, Piece.MoveNotPossible, LocateKing.KingNotFound
    {
        Coords coords = new Coords(5, 1);
        board.setPiece(new Coords(1, 1), rook);
        board.setPiece(coords, king);
        king.move(State.active, coords, new Coords(3, 1));
        assertEquals(king, board.getPiece(new Coords(3, 1)));
        assertEquals(rook, board.getPiece(new Coords(4, 1)));
    }

    @Test
    void cannotCastle() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Coords coords = new Coords(5, 1);
        rook.setMoves(1);
        board.setPiece(new Coords(1, 1), rook);
        board.setPiece(coords, king);

        assertThrows(Piece.MoveNotPossible.class, () -> king.move(State.active, coords, new Coords(3, 1)));
        assertEquals(king, board.getPiece(new Coords(5, 1)));
        assertEquals(rook, board.getPiece(new Coords(1, 1)));
    }

    @Test
    void canReturnOnlyAvailableMove() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var board = new Board();
        var king = new King(Color.black, board);

        board.setPiece(new Coords(5,8), king);
        board.setPiece(new Coords(4,8), new Queen(Color.black, board));
        board.setPiece(new Coords(6,8), new Bischop(Color.black, board));

        board.setPiece(new Coords(4,7), new Pawn(Color.white, board));
        board.setPiece(new Coords(5,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(6,7), new Pawn(Color.black, board));

        assertEquals(1, king.availableMoves(State.check, new Coords(5,8)).size());
    }

    @Test
    void canMove_withOnlyOneAvailableMove() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound, Piece.MoveNotPossible
    {
        var board = new Board();
        var king = new King(Color.black, board);

        board.setPiece(new Coords(5,8), king);
        board.setPiece(new Coords(4,8), new Queen(Color.black, board));
        board.setPiece(new Coords(6,8), new Bischop(Color.black, board));

        board.setPiece(new Coords(4,7), new Pawn(Color.white, board));
        board.setPiece(new Coords(5,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(6,7), new Pawn(Color.black, board));

        king.move(State.check, new Coords(5,8), new Coords(4,7));

        if (board.pieceOnField(new Coords(4,7)))
            assertEquals(King.class, board.getPiece(new Coords(4,7)).getClass());
        else
            fail("Should not reach.");
    }

    @Test
    void canMove_whenOnlyOneAvailableMove_takingQueen() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound, Piece.MoveNotPossible
    {
        var board = new Board();
        var king = new King(Color.white, board);

        board.setPiece(new Coords(5,8), king);
        board.setPiece(new Coords(4,8), new Queen(Color.black, board));

        king.move(State.check, new Coords(5,8), new Coords(4,8));

        if (board.pieceOnField(new Coords(4,8)))
            assertEquals(King.class, board.getPiece(new Coords(4,8)).getClass());
        else
            fail("Should not reach.");
    }
}