package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.DummyPiece;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Color;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

public class ListAvailableWhitePawnMovesTests
{
    private ListAvailableMoves usecase;

    @BeforeEach
    public void Setup()
    {
        usecase = new ListAvailableWhitePawnMoves();
    }

    @Test
    public void canReturnEmptyHashSet() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        assertEquals(0, usecase.list(new Board(), new Coords(0, 0)).size());
    }

    @Test
    public void canReturnEmptyHashSet_whenPieceIsNoPawn() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(1,1);
        board.setPiece(coords1, new DummyPiece(Color.white));
        assertEquals(0, usecase.list(board, coords1).size());
    }

    @Test
    public void canReturnEmptyHashSet_whenPieceIsNotWhite() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(1,1);
        board.setPiece(coords1, new Pawn(Color.black, board));
        assertEquals(0, usecase.list(board, coords1).size());
    }

    @Test
    public void canReturnOneAvailableMove() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords = new Coords(4, 4);
        board.setPiece(coords, new Pawn(Color.white, board));
        assertTrue(usecase.list(board, coords).contains(new Coords(4, 5)));
    }

    @Test
    public void canReturnNoAvailableMove_whenBlockingPiece() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        board.setPiece(new Coords(4,4), new Pawn(Color.white, board));
        board.setPiece(new Coords(4,5), new Pawn(Color.white, board));
        var availableMoves = usecase.list(board, new Coords(4,4));
        assertEquals(0, availableMoves.size());
    }

    @Test
    public void canReturnNoAvailableMove_whenEndOfBoardIsReached() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords = new Coords(1,8);
        board.setPiece(coords, new Pawn(Color.white, board));
        assertEquals(0, usecase.list(board, coords).size());
    }

    @Test
    public void canReturnAvailableMove_whenOppositePieceOnRightField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        var coords2 = new Coords(5,3);
        board.setPiece(coords1, new Pawn(Color.white, board));
        board.setPiece(coords2, new Pawn(Color.black, board));
        assertTrue( usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void wontReturnAvailableMove_whenPieceOfTheSameColorOnRightField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        var coords2 = new Coords(5,3);
        board.setPiece(coords1, new Pawn(Color.white, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertFalse(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void canReturnAvailableMove_whenOppositePieceOnLeftField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        var coords2 = new Coords(3,3);
        board.setPiece(coords1, new Pawn(Color.white, board));
        board.setPiece(coords2, new Pawn(Color.black, board));
        assertTrue(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void wontReturnAvailableMove_whenPieceOfTheSameColorOnLeftField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        var coords2 = new Coords(3,3);
        board.setPiece(coords1, new Pawn(Color.white, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertFalse(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void canReturnEnPassantMove_whenLeftOppositePawnMovedOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,5);
        var coords2 = new Coords(3,5);
        var whitePawn = new Pawn(Color.white, board);
        var blackPawn = new Pawn(Color.black, board);
        blackPawn.setMoves(1);
        board.setPiece(coords1, whitePawn);
        board.setPiece(coords2, blackPawn);
        assertTrue(usecase.list(board, coords1).contains(new Coords(3,6)));
    }

    @Test
    public void wontReturnEnPassantMove_whenSameColoredPawn_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,5);
        var coords2 = new Coords(3,5);
        var pawn1 = new Pawn(Color.white, board);
        var pawn2 = new Pawn(Color.white, board);
        pawn2.setMoves(1);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(3,6)));
    }

    @Test
    public void wontReturnEnPassantMove_whenMovedMoreThanOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,5);
        var coords2 = new Coords(3,5);
        var pawn1 = new Pawn(Color.white, board);
        var pawn2 = new Pawn(Color.black, board);
        pawn2.setMoves(2);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(3,6)));
    }

    @Test
    public void wontReturnEnPassantMove_whenOppositePawnMovedOneRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,6);
        var coords2 = new Coords(3,6);
        var pawn1 = new Pawn(Color.white, board);
        var pawn2 = new Pawn(Color.black, board);
        pawn2.setMoves(1);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(3,7)));
    }

    @Test
    public void canReturnEnPassantMove_whenRightOppositePawnMovedOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,5);
        var coords2 = new Coords(5,5);
        var whitePawn = new Pawn(Color.white, board);
        var blackPawn = new Pawn(Color.black, board);
        blackPawn.setMoves(1);
        board.setPiece(coords1, whitePawn);
        board.setPiece(coords2, blackPawn);
        assertTrue(usecase.list(board, coords1).contains(new Coords(5,6)));
    }

    @Test
    public void canReturnTwoRowMove_whenNoMovesAreMade() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        board.setPiece(coords1, new Pawn(Color.white, board));
        assertTrue(usecase.list(board, coords1).contains(new Coords(4,4)));
    }

    @Test
    public void wontReturnTwoRowMove_whenPieceIsBlocking() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,2);
        var coords2 = new Coords(4,4);
        board.setPiece(coords1, new Pawn(Color.white, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertFalse(usecase.list(board, coords1).contains(new Coords(4,4)));
    }
}