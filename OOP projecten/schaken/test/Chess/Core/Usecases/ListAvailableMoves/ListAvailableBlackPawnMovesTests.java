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

public class ListAvailableBlackPawnMovesTests
{
    private ListAvailableMoves usecase;

    @BeforeEach
    public void Setup()
    {
        usecase = new ListAvailableBlackPawnMoves();
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
        var coords1 = new Coords(1,8);
        board.setPiece(coords1, new DummyPiece(Color.white));
        assertEquals(0, usecase.list(board, coords1).size());
    }

    @Test
    public void canReturnEmptyHashSet_whenPieceIsNotBlack() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(1,8);
        board.setPiece(coords1, new Pawn(Color.white, board));
        assertEquals(0, usecase.list(board, coords1).size());
    }

    @Test
    public void canReturnOneAvailableMove() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords = new Coords(4, 7);
        board.setPiece(coords, new Pawn(Color.black, board));
        assertTrue(usecase.list(board, coords).contains(new Coords(4, 6)));
    }

    @Test
    public void canReturnNoAvailableMove_whenBlockingPiece() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        board.setPiece(new Coords(4,5), new Pawn(Color.black, board));
        board.setPiece(new Coords(4,4), new Pawn(Color.black, board));
        assertEquals(0, usecase.list(board, new Coords(4,5)).size());
    }

    @Test
    public void canReturnNoAvailableMove_whenEndOfBoardIsReached() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords = new Coords(1,1);
        board.setPiece(coords, new Pawn(Color.black, board));
        assertEquals(0, usecase.list(board, coords).size());
    }

    @Test
    public void canReturnAvailableMove_whenOppositePieceOnRightField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,3);
        var coords2 = new Coords(3,2);
        board.setPiece(coords1, new Pawn(Color.black, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertTrue(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void wontReturnAvailableMove_whenPieceOfTheSameColorOnRightField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,3);
        var coords2 = new Coords(3,2);
        board.setPiece(coords1, new Pawn(Color.black, board));
        board.setPiece(coords2, new Pawn(Color.black, board));
        assertFalse(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void canReturnAvailableMove_whenOppositePieceOnLeftField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,3);
        var coords2 = new Coords(5,2);
        board.setPiece(coords1, new Pawn(Color.black, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertTrue(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void wontReturnAvailableMove_whenPieceOfTheSameColorOnLeftField() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,3);
        var coords2 = new Coords(5,2);
        board.setPiece(coords1, new Pawn(Color.black, board));
        board.setPiece(coords2, new Pawn(Color.black, board));
        assertFalse(usecase.list(board, coords1).contains(coords2));
    }

    @Test
    public void canReturnEnPassantMove_whenLeftOppositePawnMovedOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,4);
        var coords2 = new Coords(5,4);
        var whitePawn = new Pawn(Color.black, board);
        var blackPawn = new Pawn(Color.white, board);
        blackPawn.setMoves(1);
        board.setPiece(coords1, whitePawn);
        board.setPiece(coords2, blackPawn);
        assertTrue(usecase.list(board, coords1).contains(new Coords(5,3)));
    }

    @Test
    public void wontReturnEnPassantMove_whenLeftSameColoredPawn_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,4);
        var coords2 = new Coords(5,4);
        var pawn1 = new Pawn(Color.black, board);
        var pawn2 = new Pawn(Color.black, board);
        pawn2.setMoves(1);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(5,3)));
    }

    @Test
    public void wontReturnEnPassantMove_whenLeftMovedMoreThanOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,4);
        var coords2 = new Coords(5,4);
        var pawn1 = new Pawn(Color.black, board);
        var pawn2 = new Pawn(Color.white, board);
        pawn2.setMoves(2);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(5,3)));
    }

    @Test
    public void wontReturnEnPassantMove_whenLeftOppositePawnMovedOneRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,3);
        var coords2 = new Coords(5,3);
        var pawn1 = new Pawn(Color.black, board);
        var pawn2 = new Pawn(Color.white, board);
        pawn2.setMoves(1);
        board.setPiece(coords1, pawn1);
        board.setPiece(coords2, pawn2);
        assertFalse(usecase.list(board, coords1).contains(new Coords(5,2)));
    }

    @Test
    public void canReturnEnPassantMove_whenRightOppositePawnMovedOnce_andOnEnPassantRow() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(5,4);
        var coords2 = new Coords(4,4);
        var whitePawn = new Pawn(Color.black, board);
        var blackPawn = new Pawn(Color.white, board);
        blackPawn.setMoves(1);
        board.setPiece(coords1, whitePawn);
        board.setPiece(coords2, blackPawn);
        assertTrue(usecase.list(board, coords1).contains(new Coords(4,3)));
    }

    @Test
    public void canReturnTwoRowMove_whenNoMovesAreMade() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,7);
        board.setPiece(coords1, new Pawn(Color.black, board));
        assertTrue(usecase.list(board, coords1).contains(new Coords(4,5)));
    }

    @Test
    public void wontReturnTwoRowMove_whenPieceIsBlocking() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var coords1 = new Coords(4,5);
        var coords2 = new Coords(4,3);
        board.setPiece(coords1, new Pawn(Color.black, board));
        board.setPiece(coords2, new Pawn(Color.white, board));
        assertFalse(usecase.list(board, coords1).contains(new Coords(4,3)));
    }
}